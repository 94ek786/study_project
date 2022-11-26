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
        if (typeof landlord_n === 'undefined') {
            alert("請先安裝MetaMask");
            history.back();
        } else {
            url_c();
        }
    }
});

//判斷會員是否安裝
function url_c() {
    var url = window.location.href;
    try {
        var i = url.split('no_matamask=')[1].split('&')[0];
    } catch (error) {
        window.location = window.location.pathname + '?no_matamask=true&';
    }
    if (i != 'true') {
        window.location = window.location.pathname + '?no_matamask=true&';
    }
}


function startApp() {
    var name1 = '0x86a6182fC51C7d81013Bdb67688C71B88bDDb8C3';
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

async function tenantVerify(id) {
    userAccount = web3.currentProvider.selectedAddress;
    const a = await resolveAfter2Seconds(20);

    var tenantVerify = await search.methods.tenantVerify(id).call({
        from: userAccount
    });
    var contract = tenantVerify;
    return contract;

}
async function houseaddress(id) {
    userAccount = web3.currentProvider.selectedAddress;
    const a = await resolveAfter2Seconds(20);

    var houseaddress = await search.methods.houseaddress(id).call({
        from: userAccount
    });
    var contract = houseaddress;
    return contract;

}
async function housename(id) {
    userAccount = web3.currentProvider.selectedAddress;
    const a = await resolveAfter2Seconds(20);
    var housename = await search.methods.housename(id).call({
        from: userAccount
    });
    var contract = housename;
    return contract;
}
async function rent_per_month(id) {
    userAccount = web3.currentProvider.selectedAddress;
    const a = await resolveAfter2Seconds(20);

    var rent_per_month = await search.methods.rent_per_month(id).call({
        from: userAccount
    });

    var contract = rent_per_month;
    return contract;

}
async function securityDeposit(id) {
    userAccount = web3.currentProvider.selectedAddress;
    const a = await resolveAfter2Seconds(20);

    var securityDeposit = await search.methods.securityDeposit(id).call({
        from: userAccount
    });

    var contract = securityDeposit;
    return contract;

}