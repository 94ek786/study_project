var LeaseContract = [{
        "constant": true,
        "inputs": [{
            "internalType": "uint256",
            "name": "",
            "type": "uint256"
        }],
        "name": "HouseAgreement_by_No",
        "outputs": [{
                "internalType": "uint256",
                "name": "houseid",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "agreementid",
                "type": "uint256"
            },
            {
                "internalType": "string",
                "name": "Housename",
                "type": "string"
            },
            {
                "internalType": "string",
                "name": "HouseAddress",
                "type": "string"
            },
            {
                "internalType": "uint256",
                "name": "rent_per_month",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "securityDeposit",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "lockInPeriod",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "timestamp",
                "type": "uint256"
            },
            {
                "internalType": "address payable",
                "name": "tenantAddress",
                "type": "address"
            },
            {
                "internalType": "address payable",
                "name": "landlordAddress",
                "type": "address"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [{
            "internalType": "uint256",
            "name": "",
            "type": "uint256"
        }],
        "name": "House_by_no",
        "outputs": [{
                "internalType": "uint256",
                "name": "houseid",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "agreementid",
                "type": "uint256"
            },
            {
                "internalType": "string",
                "name": "housename",
                "type": "string"
            },
            {
                "internalType": "string",
                "name": "houseaddress",
                "type": "string"
            },
            {
                "internalType": "uint256",
                "name": "rent_per_month",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "securityDeposit",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "timestamp",
                "type": "uint256"
            },
            {
                "internalType": "bool",
                "name": "vacant",
                "type": "bool"
            },
            {
                "internalType": "address payable",
                "name": "landlord",
                "type": "address"
            },
            {
                "internalType": "address payable",
                "name": "currentTenant",
                "type": "address"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [{
            "internalType": "uint256",
            "name": "",
            "type": "uint256"
        }],
        "name": "Rent_by_No",
        "outputs": [{
                "internalType": "uint256",
                "name": "rentno",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "houseid",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "agreementid",
                "type": "uint256"
            },
            {
                "internalType": "string",
                "name": "Housename",
                "type": "string"
            },
            {
                "internalType": "string",
                "name": "HouseAddress",
                "type": "string"
            },
            {
                "internalType": "uint256",
                "name": "rent_per_month",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "timestamp",
                "type": "uint256"
            },
            {
                "internalType": "address payable",
                "name": "tenantAddress",
                "type": "address"
            },
            {
                "internalType": "address payable",
                "name": "landlordAddress",
                "type": "address"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": false,
        "inputs": [{
                "internalType": "string",
                "name": "_housename",
                "type": "string"
            },
            {
                "internalType": "string",
                "name": "_houseaddress",
                "type": "string"
            },
            {
                "internalType": "uint256",
                "name": "_rentcost",
                "type": "uint256"
            },
            {
                "internalType": "uint256",
                "name": "_securitydeposit",
                "type": "uint256"
            }
        ],
        "name": "addHouse",
        "outputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "constant": false,
        "inputs": [{
            "internalType": "uint256",
            "name": "_index",
            "type": "uint256"
        }],
        "name": "agreementCompleted",
        "outputs": [],
        "payable": true,
        "stateMutability": "payable",
        "type": "function"
    },
    {
        "constant": false,
        "inputs": [{
            "internalType": "uint256",
            "name": "_index",
            "type": "uint256"
        }],
        "name": "agreementTerminated",
        "outputs": [],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "no_of_agreement",
        "outputs": [{
            "internalType": "uint256",
            "name": "",
            "type": "uint256"
        }],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "no_of_house",
        "outputs": [{
            "internalType": "uint256",
            "name": "",
            "type": "uint256"
        }],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "no_of_rent",
        "outputs": [{
            "internalType": "uint256",
            "name": "",
            "type": "uint256"
        }],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": false,
        "inputs": [{
            "internalType": "uint256",
            "name": "_index",
            "type": "uint256"
        }],
        "name": "signAgreement",
        "outputs": [],
        "payable": true,
        "stateMutability": "payable",
        "type": "function"
    }
]