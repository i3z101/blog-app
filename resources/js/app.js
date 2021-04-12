require('./bootstrap');


let success= document.querySelector('#success');
let indexId= document.querySelector('#indexId');

console.log(success);
console.log(success);

if(success !== null){
    setTimeout(()=>{
        indexId.removeChild(success);
    }, 3000)
}