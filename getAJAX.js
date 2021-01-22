function getAJAX(url) {
    return new Promise((resolve) => {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                resolve(JSON.parse(this.response))
            }  
        }
        xhttp.open("GET", url, true);
        xhttp.send();
    })
}