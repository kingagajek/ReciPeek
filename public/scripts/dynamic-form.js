document.addEventListener('DOMContentLoaded', () => {
    const fileUpload = document.getElementById('file-upload');
    const imageUploadContainer = document.querySelector('.image-preview-container');
    const imageUploadLabel = document.querySelector('.image-upload-label');

    fileUpload.addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const imageTag = document.createElement('img');
            imageTag.classList.add('image-preview');
            imageTag.src = URL.createObjectURL(file);
            imageTag.onload = () => URL.revokeObjectURL(imageTag.src);

            const changeButton = document.createElement('button');
            changeButton.textContent = 'CHANGE IMAGE';
            changeButton.classList.add('change-image-button');
            changeButton.type = 'button';
            changeButton.onclick = () => fileUpload.click();

            imageUploadContainer.innerHTML = '';
            imageUploadContainer.appendChild(imageTag);
            imageUploadContainer.appendChild(changeButton);
            imageUploadLabel.style.display = 'none';
        }
    });
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
        newIngredient.innerHTML = `
        <input type="text" name="ingredients[]" placeholder="Ingredient..." class="ingredient-input">
        <input type="number" name="quantities[]" placeholder="Quantity..." class="ingredient-quantity" min="0" step="any">
        <input type="text" name="measurements[]" placeholder="Measurement..." class="ingredient-measurement">
    `;
        ingredientsList.appendChild(newIngredient);
        newIngredient.querySelector('.ingredient-input').focus();
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