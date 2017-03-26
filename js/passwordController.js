var sourceGen = [
    '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
    'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
    'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd',
    'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n',
    'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x',
    'y', 'z'
];

function startGen() {
    return hashToSHA1(createPassword(4));
}

function createPassword(n) {
    var pass = "";
    for (i = 0; i < n; i++) {
        temp = Math.ceil(Math.random() * sourceGen.length);
        pass += sourceGen[temp];
    }
    return pass;
}

function hashToSHA1(pass) {
    var shaObj = new jsSHA("SHA-1", "TEXT");
    shaObj.update(pass);
    var hashPass = shaObj.getHash("HEX");
    return hashPass;
}