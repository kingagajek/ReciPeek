document.querySelector('.image-upload-label').addEventListener('click', function() {
    document.getElementById('file-upload').click();
});
document.addEventListener('DOMContentLoaded', () => {
    const ingredientsList = document.getElementById('ingredients-list');
    const addIngredientBtn = document.getElementById('add-ingredient-btn');
    const instructionsList = document.getElementById('instructions-list');
    const addInstructionBtn = document.getElementById('add-instruction-btn');
    let instructionCounter = 1;

    function addIngredient() {
        const newIngredient = document.createElement('div');
        newIngredient.classList.add('ingredient-item');
        newIngredient.innerHTML = '<input type="text" name="ingredients[]" placeholder="Ingredient..." class="ingredient-input">';
        ingredientsList.appendChild(newIngredient);
        newIngredient.querySelector('input').focus();
    }

    function addInstructionStep() {
        const newInstruction = document.createElement('div');
        newInstruction.classList.add('instruction-step');
        newInstruction.innerHTML = `
            <label class="step-label">${instructionCounter}.</label>
            <textarea name="instructions[]" class="instruction-input" placeholder="Enter instruction..."></textarea>
        `;
        instructionsList.appendChild(newInstruction);
        newInstruction.querySelector('textarea').focus();
        instructionCounter++;
    }

    addIngredientBtn.addEventListener('click', addIngredient);
    addInstructionBtn.addEventListener('click', addInstructionStep);

    ingredientsList.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && e.target.classList.contains('ingredient-input')) {
            e.preventDefault();
            addIngredient();
        }
    });

    instructionsList.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && e.target.classList.contains('instruction-input')) {
            e.preventDefault();
            addInstructionStep();
        }
    });

    addInstructionStep();
});