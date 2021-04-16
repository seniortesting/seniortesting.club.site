// return new Promise((resolve, reject) => {
//     (function (){
//         i=3
//         resolve(i)
//     })()
// })

// const callback = arguments[arguments.length - 1];
const xhr = new XMLHttpRequest();
xhr.open('GET', 'https://api.ipify.org/?format=json', true);
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
        res = xhr.responseText
        callback(res)
    }
}
xhr.send()
