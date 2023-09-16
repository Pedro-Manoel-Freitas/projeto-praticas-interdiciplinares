const expenseForm = document.getElementById('expense-form');
const expenseInput = document.getElementById('expense-input');
const amountInput = document.getElementById('amount-input');
const balanceAmount = document.getElementById('balance-amount');
const expenseList = document.getElementById('expense-list');

let balance = 0;

expenseForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const expenseName = expenseInput.value;
    const expenseAmount = parseFloat(amountInput.value);

    if (!expenseName || isNaN(expenseAmount)) {
        alert('Preencha o nome e o valor da despesa corretamente.');
        return;
    }

    const listItem = document.createElement('li');
    listItem.innerHTML = `
        ${expenseName}: R$ ${expenseAmount.toFixed(2)}
        <button onclick="removeExpense(this)">Remover</button>
    `;

    expenseList.appendChild(listItem);

    balance += expenseAmount;
    balanceAmount.textContent = balance.toFixed(2);

    expenseInput.value = '';
    amountInput.value = '';
});

function removeExpense(button) {
    const listItem = button.parentElement;
    const expenseAmount = parseFloat(listItem.textContent.match(/R\$\s([\d\.]+)/)[1]);
    
    balance -= expenseAmount;
    balanceAmount.textContent = balance.toFixed(2);
    
    listItem.remove();
}