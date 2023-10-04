const transactionForm = document.getElementById('transaction-form');
const transactionInput = document.getElementById('transaction-input');
const amountInput = document.getElementById('amount-input');
const transactionTypeSelect = document.getElementById('transaction-type');
const transactionList = document.getElementById('transaction-list');
const balanceAmount = document.getElementById('balance-amount');

let balance = 0;

function addTransaction(transactionName, transactionAmount, transactionType) {
    const listItem = document.createElement('li');
    const transactionSign = transactionType === 'expense' ? '-' : '+';

    const transactionItem = `${transactionName}: ${transactionSign} R$ ${transactionAmount.toFixed(2)}`;
    listItem.textContent = transactionItem;

    transactionList.appendChild(listItem);

    if (transactionType === 'expense') {
        balance -= transactionAmount;
    } else {
        balance += transactionAmount;
    }

    balanceAmount.textContent = `R$ ${balance.toFixed(2)}`;
}

transactionForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const transactionName = transactionInput.value;
    const transactionAmount = parseFloat(amountInput.value);
    const transactionType = transactionTypeSelect.value;

    if (!transactionName || isNaN(transactionAmount)) {
        alert('Preencha o nome e o valor da transação corretamente.');
        return;
    }

    addTransaction(transactionName, transactionAmount, transactionType);

    transactionInput.value = '';
    amountInput.value = '';
});
