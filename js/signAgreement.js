window.addEventListener('load', async() => {
    if (window.ethereum) {
        web3js = new Web3(window.ethereum);
        const accounts = await window.ethereum.request({
            method: 'eth_requestAccounts'
        });
        startAp();
        FB.init();
    } else if (window.web3) {
        web3js = new Web3(web3.currentProvider);
        startAp();
        FB.init();
    } else {
        alert("請先安裝MetaMask");
    }
});

function startAp() {
    var name1 = '0x86a6182fC51C7d81013Bdb67688C71B88bDDb8C3';
    search = new web3js.eth.Contract(LeaseContract, name1);
    userAccount = web3.currentProvider.selectedAddress;

}


$(document).ready(function() {
    $(".up4").click(async function() {

        userAccount = web3.currentProvider.selectedAddress;


        Search = document.getElementById("Search").value;

        var send3 = await search.methods.signAgreement(Search).send({
            from: userAccount
        });

    });

});