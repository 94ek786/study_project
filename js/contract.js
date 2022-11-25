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
    var name1 = '0xc143fa770f9b28e55c1fbc97590941763f8351ae';
    search = new web3js.eth.Contract(LeaseContract, name1);
    userAccount = web3.currentProvider.selectedAddress;

}
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
    var name1 = '0xc143fa770f9b28e55c1fbc97590941763f8351ae';
    search = new web3js.eth.Contract(LeaseContract, name1);
    userAccount = web3.currentProvider.selectedAddress;

}
$(document).ready(function() {
    $(".up1").click(async function() {

        userAccount = web3.currentProvider.selectedAddress;

        Housename = document.getElementById("housename").value;

        HouseAddress = document.getElementById("houseaddress").value;

        rentcost = document.getElementById("rentcost").value;
        securitydeposit = document.getElementById("securitydeposit").value;
        var send2 = await search.methods.addHouse(Housename, HouseAddress, rentcost, securitydeposit).send({
            from: userAccount
        });

    });

});