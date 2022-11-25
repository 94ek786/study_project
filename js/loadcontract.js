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


function startApp() {
    var name1 = '0xEbB80E5f0836beC0CfD7E9e6dFaF8F04A0A4179b';
    search = new web3js.eth.Contract(LeaseContract, name1);
    userAccount = web3.currentProvider.selectedAddress;

}



$(document).ready(function() {
    $(".up6").click(async function() {

        userAccount = web3.currentProvider.selectedAddress;


        Search = document.getElementById("Search").value;

        var send3 = await search.methods.securityDeposit(Search).call({
            from: userAccount
        });
        alert("每月租金" + send3 + "元");
    });

});

function resolveAfter2Seconds(x) {
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(x);
        }, 1);
    });
}

async function loadcontract(id) {
    userAccount = web3.currentProvider.selectedAddress;
    const a = await resolveAfter2Seconds(20);
    var housename = await search.methods.housename(id).call({
        from: userAccount
    });
    var houseaddress = await search.methods.houseaddress(id).call({
        from: userAccount
    });
    var rent_per_month = await search.methods.rent_per_month(id).call({
        from: userAccount
    });
    var securityDeposit = await search.methods.securityDeposit(id).call({
        from: userAccount
    });
    var tenantVerify = await search.methods.tenantVerify(id).call({
        from: userAccount
    });
    var contract = housename + "房租" + houseaddress;
    return contract;

}