window.addEventListener('load', async() => {
    if (window.ethereum) {
        web3js = new Web3(window.ethereum);
        const accounts = await window.ethereum.request({
            method: 'eth_requestAccounts'
        });
        startApp();
        FB.init();
    } else if (window.web3) {
        web3js = new Web3(web3.currentProvider);
        startApp();
        FB.init();
    } else {
        alert("請先安裝MetaMask");
    }
});

/*function startApp() {
    var name1 = '0xc143fa770f9b28e55c1fbc97590941763f8351ae';
    search = new web3js.eth.Contract(LeaseContract, name1);
    userAccount = web3.currentProvider.selectedAddress;

}
*/
function startApp() {
    var name1 = '0x86a6182fC51C7d81013Bdb67688C71B88bDDb8C3';
    search = new web3js.eth.Contract(LeaseContract, name1);
    userAccount = web3.currentProvider.selectedAddress;

}


$(document).ready(function() {
    $(".up1").click(async function() {

        var userAccount = web3.currentProvider.selectedAddress;

        var Housename = document.getElementById("housename").value;

        var HouseAddress = document.getElementById("houseaddress").value;

        var rentcost = document.getElementById("rentcost").value;
        var securitydeposit = document.getElementById("securitydeposit").value;
        var tenantVerify = document.getElementById("tenantVerify").value;
        var addhouse = await search.methods.addHouse(Housename, HouseAddress, rentcost, securitydeposit, tenantVerify).send({
            from: userAccount
        });

    });

});
$(document).ready(function() {
    $(".up2").click(async function() {

        userAccount = web3.currentProvider.selectedAddress;


        Search = document.getElementById("Search").value;

        var send3 = await search.methods.tenantVerify(Search).call({
            from: userAccount
        });
        alert("每月租金" + send3 + "元");
    });

});