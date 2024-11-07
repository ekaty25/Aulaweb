function validarEmail() {
    const emailInput = document.getElementById('email');
    const feedback = document.getElementById('feedback');


    if (!emailInput || !feedback) {
        console.error("Elementos de entrada não encontrados.");
        return false; 
    }


    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailInput.value)) {
        feedback.textContent = "Por favor, insira um e-mail válido.";
        feedback.style.color = "red";
        return false; 
    }
    

    feedback.textContent = "Inscrevendo...";
    feedback.style.color = "blue";


    return true;
}
