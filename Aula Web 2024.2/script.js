
function confirma(){
    resposta =confirm("Confirma");
if(resposta==1){
    return true
}else{

}return false;

}

function perguntaEndereco(){
    do{
    endreco= prompt("insira o seu endereço:");
    confirma = confirm("Seu endereço é:"+ endreco);
}while(!confirma);
alert("A página será alterada...");
document.write("Seu endereço é"+ endreco+".");

}



     




