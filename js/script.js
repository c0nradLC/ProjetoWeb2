var hoje = new Date()
var ano = hoje.getFullYear();
document.querySelector('footer p').innerHTML = `Todos os direitos Reservados&copy; - ${ano}`
var buttonSair = document.querySelectorAll('.sair button');
for(let i = 0 ; i< buttonSair.length;i++){
        buttonSair[i].addEventListener('click', ()=>{
                if(i==0){
                        window.location.href = "index.php";
                }else{
                        document.querySelector('.sairMain').style.display = "none"
                }
        })
}

function openSair(){
        document.querySelector('.sairMain').style.display = "flex"
}