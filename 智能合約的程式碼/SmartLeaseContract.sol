pragma solidity ^0.5.16;
//import "zeppelin-solidity/contracts/ECRecovery.sol";

contract LeaseContract{
    address payable tenant;
    address payable landlord;
    //address payable houseInformation;
    uint public no_of_house = 0;
    uint public no_of_agreement = 0;
    uint public no_of_rent = 0;

    struct House{
        uint houseid;
        uint agreementid;
        string housename;
        string houseaddress;
        uint rent_per_month;
        uint securityDeposit;
        uint timestamp;
        bool vacant;
        address payable tenantVerify;
        address payable landlord;
        address payable currentTenant;
    }

    mapping(uint => House) public House_by_no;
    mapping(address => House) public houseInfo;

    struct HouseAgreement{
        uint houseid;
        uint agreementid;
        string Housename;
        string HouseAddress;
        uint rent_per_month;
        uint securityDeposit;
        uint lockInPeriod;
        uint timestamp;
        address payable tenantAddress;
        address payable landlordAddress;
        
    }

    mapping(uint => HouseAgreement) public HouseAgreement_by_No;

    struct Rent{
        uint rentno;
        uint houseid;
        uint agreementid;
        string Housename;
        string HouseAddress;
        uint rent_per_month;
        uint timestamp;
        address payable tenantAddress;
        address payable landlordAddress;
    }

    mapping(uint => Rent) public Rent_by_No;

    modifier onlyLandlord(uint _index) {
        require(msg.sender == House_by_no
        [_index].landlord, "Only landlord can access this");
        _;
    }

    modifier notLandLord(uint _index) {
        require(msg.sender != House_by_no
        [_index].landlord, "Only Tenant can access this");
        _;
    }

    modifier OnlyWhileVacant(uint _index){
        
        require(House_by_no
        [_index].vacant == true, "House is currently Occupied.");
        _;
    }

    modifier VerifyID(uint _index){
        require(msg.sender==House_by_no[_index].tenantVerify,"您不是房東所指定的房客");
        _;
    }
 
    modifier sameTenant(uint _index) {
        require(msg.sender == House_by_no
        [_index].currentTenant, "No previous agreement found with you & landlord");
        _;
    }

    modifier AgreementTimesLeft(uint _index) {
        uint _AgreementNo = House_by_no
        [_index].agreementid;
        uint time = HouseAgreement_by_No[_AgreementNo].timestamp + HouseAgreement_by_No[_AgreementNo].lockInPeriod;
        require(now < time, "Agreement already Ended");
        _;
    }

    modifier AgreementTimesUp(uint _index) {
        uint _AgreementNo = House_by_no
        [_index].agreementid;
        uint time = HouseAgreement_by_No[_AgreementNo].timestamp + HouseAgreement_by_No[_AgreementNo].lockInPeriod;
        require(now > time, "Time is left for contract to end");
        _;
    }

    modifier RentTimesUp(uint _index) {
        uint time = House_by_no
        [_index].timestamp + 30 days;
        require(now >= time, "Time left to pay Rent");
        _;
    }

    modifier enoughAgreementfee(uint _index) {
        require(msg.value >= uint(uint(House_by_no[_index].rent_per_month) + uint(House_by_no[_index].securityDeposit)), "Not enough Ether in your wallet");
        _;
    }

    modifier enoughRent(uint _index) {
        require(msg.value >= uint(House_by_no[_index].rent_per_month), "Not enough Ether in your wallet");
        _;
    }

    function addHouse(string memory _housename, string memory _houseaddress, uint _rentcost, uint  _securitydeposit,address payable verifyID) public {
        require(msg.sender != address(0));
        no_of_house ++;
        address payable houseInformation=msg.sender;
        bool _vacancy = true;
        address payable tenantVerify=verifyID;
        House_by_no
        [no_of_house] = House(no_of_house,0,_housename,_houseaddress,_rentcost,_securitydeposit,0,_vacancy,address (tenantVerify), msg.sender, address(0)); 
        houseInfo[houseInformation]= House(no_of_house,0,_housename,_houseaddress,_rentcost,_securitydeposit,0,_vacancy,address (tenantVerify), msg.sender, address(0));
        
        
    }
    
    

    function payRent(uint _index) public payable sameTenant(_index) RentTimesUp(_index) enoughRent(_index){
        require(msg.sender != address(0));
        address payable _landlord = House_by_no[_index].landlord;
        uint _rent = House_by_no[_index].rent_per_month;
        _landlord.transfer(_rent);
        House_by_no[_index].currentTenant = msg.sender;
        House_by_no[_index].vacant = false;
        no_of_rent++;
        Rent_by_No[no_of_rent] = Rent(no_of_rent,_index,House_by_no[_index].agreementid,House_by_no[_index].housename,House_by_no[_index].houseaddress,_rent,now,msg.sender,House_by_no[_index].landlord);
    }

    function signAgreement(uint _index) public payable notLandLord(_index)  OnlyWhileVacant(_index) VerifyID(_index){
        require(msg.sender != address(0));
        address payable _landlord = House_by_no[_index].landlord;
        //uint totalfee = House_by_no[_index].rent_per_month + House_by_no[_index].securityDeposit;
        //_landlord.transfer(totalfee);
        no_of_agreement++;
        House_by_no[_index].currentTenant = msg.sender;
        House_by_no[_index].vacant = false;
        House_by_no[_index].timestamp = block.timestamp;
        House_by_no[_index].agreementid = no_of_agreement;
        HouseAgreement_by_No[no_of_agreement]=HouseAgreement(_index,no_of_agreement,House_by_no[_index].housename,House_by_no[_index].houseaddress,House_by_no
        [_index].rent_per_month,House_by_no
        [_index].securityDeposit,35 seconds,block.timestamp,msg.sender,_landlord);
        no_of_rent++;
        Rent_by_No[no_of_rent] = Rent(no_of_rent,_index,no_of_agreement,House_by_no
        [_index].housename,House_by_no
        [_index].houseaddress,House_by_no
        [_index].rent_per_month,now,msg.sender,_landlord);
        
    }


    function agreementCompleted(uint _index) public payable onlyLandlord(_index) AgreementTimesUp(_index){
        require(msg.sender != address(0));
        require(House_by_no
        [_index].vacant == false, "House is currently Occupied.");
        House_by_no
        [_index].vacant = true;
        address payable _Tenant = House_by_no
        [_index].currentTenant;
        uint _securitydeposit = House_by_no
        [_index].securityDeposit;
        _Tenant.transfer(_securitydeposit);
    }

    function agreementTerminated(uint _index) public onlyLandlord(_index) AgreementTimesLeft(_index){
        require(msg.sender != address(0));
        House_by_no[_index].vacant = true;
    }

}