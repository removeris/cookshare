let modal = false;

function createNewIngredient() {
    const ingredientList = document.getElementById('ingredients');

    const newListItem = document.createElement('li');

    const newButton = document.createElement('button');
    newButton.textContent = "-";
    newButton.onclick = function() {
        deleteListItem(newButton);
    }
    

    const ingredientName = document.createElement('input');
    ingredientName.setAttribute('placeholder', 'Product');
    ingredientName.setAttribute('type', 'text');
    ingredientName.setAttribute('name', 'ingredientName[]');

    const ingredientQuantity = document.createElement('input');
    ingredientQuantity.setAttribute('type', 'text')
    ingredientQuantity.setAttribute('placeholder', 'Quantity');
    ingredientQuantity.setAttribute('name', 'ingredientQuantity[]');

    const measurementUnit = document.createElement('input')
    measurementUnit.setAttribute('type', 'text');
    measurementUnit.setAttribute('placeholder', 'Units')
    measurementUnit.setAttribute('name', 'measurementUnit[]');

    newListItem.appendChild(ingredientName);
    newListItem.appendChild(ingredientQuantity);
    newListItem.appendChild(measurementUnit);
    newListItem.appendChild(newButton);

    ingredientList.appendChild(newListItem);
};

function createNewInstruction() {
    const instructionList = document.getElementById('instructions');

    const newListItem = document.createElement('li');

    const newButton = document.createElement('button');
    newButton.textContent = "-";
    newButton.onclick = function() {
        deleteListItem(newButton);
    }

    const instruction = document.createElement('textarea');
    instruction.setAttribute('placeholder', 'Add instructions here');
    instruction.setAttribute('name', 'instruction[]');

    newListItem.appendChild(instruction);
    newListItem.appendChild(newButton);

    instructionList.appendChild(newListItem);
}

function toggleModal() {

    event.preventDefault();

    modal = !modal;
    if (modal == true) {
        const pageModal = document.getElementsByClassName('confirmation-box')[0];;
        pageModal.style.display = "flex";
    } else {
        const pageModal = document.getElementsByClassName('confirmation-box')[0];
        pageModal.style.display = "none";
    }
}

function submitForm() {
    const targetForm = document.getElementById('delete-recipe');

    targetForm.submit();
}

function deleteListItem(item) {
    item.parentNode.remove();
}

window.createNewIngredient = createNewIngredient
window.createNewInstruction = createNewInstruction
window.toggleModal = toggleModal
window.submitForm = submitForm
window.deleteListItem = deleteListItem