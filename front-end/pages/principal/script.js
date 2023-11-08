const expenseTransactionForm = document.getElementById('expense-transaction-form');
const incomeTransactionForm = document.getElementById('income-transaction-form');
const expenseTransactionInput = document.getElementById('expense-transaction-input');
const incomeTransactionInput = document.getElementById('income-transaction-input');
const expenseAmountInput = document.getElementById('expense-amount-input');
const incomeAmountInput = document.getElementById('income-amount-input');
const expenseTransactionList = document.getElementById('expense-transaction-list');
const incomeTransactionList = document.getElementById('income-transaction-list');
const expenseBalanceAmount = document.getElementById('expense-balance-amount');
const incomeBalanceAmount = document.getElementById('income-balance-amount');
const availableBalance = document.getElementById('available-balance');

let expenseBalance = 0;
let incomeBalance = 0;

function addTransaction(transactionName, transactionAmount, transactionType) {
    const listItem = document.createElement('li');
    const transactionSign = transactionType === 'expense' ? '-' : '+';
    const transactionItem = `${transactionName}: ${transactionSign} R$ ${transactionAmount.toFixed(2)}`;
    listItem.textContent = transactionItem;

    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remover';
    removeButton.addEventListener('click', () => {
        removeTransaction(listItem, transactionAmount, transactionType);
    });

    listItem.appendChild(removeButton);

    if (transactionType === 'expense') {
        expenseTransactionList.appendChild(listItem);
        expenseBalance -= transactionAmount;
        expenseBalanceAmount.textContent = ` ${expenseBalance.toFixed(2)}`;
    } else {
        incomeTransactionList.appendChild(listItem);
        incomeBalance += transactionAmount;
        incomeBalanceAmount.textContent = ` ${incomeBalance.toFixed(2)}`;
    }

    calculateAvailableBalance();
}

// Formulário de despesas
expenseTransactionForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const transactionName = expenseTransactionInput.value;
    const transactionAmount = -parseFloat(expenseAmountInput.value);

    if (!transactionName || isNaN(transactionAmount)) {
        alert('Preencha o nome e o valor da despesa corretamente.');
        return;
    }

    addTransaction(transactionName, transactionAmount, 'expense');
    expenseTransactionInput.value = '';
    expenseAmountInput.value = '';
});

incomeTransactionForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const transactionName = incomeTransactionInput.value;
    const transactionAmount = parseFloat(incomeAmountInput.value);

    if (!transactionName || isNaN(transactionAmount)) {
        alert('Preencha o nome e o valor do ganho corretamente.');
        return;
    }

    addTransaction(transactionName, transactionAmount, 'income');
    incomeTransactionInput.value = '';
    incomeAmountInput.value = '';
});

function removeTransaction(transactionElement, transactionAmount, transactionType) {
    transactionElement.remove();
    if (transactionType === 'expense') {
        expenseBalance += transactionAmount;
        expenseBalanceAmount.textContent = ` ${expenseBalance.toFixed(2)}`;
    } else {
        incomeBalance -= transactionAmount;
        incomeBalanceAmount.textContent = ` ${incomeBalance.toFixed(2)}`;
    }
    calculateAvailableBalance();
}

function calculateAvailableBalance() {
    const availableBalanceValue = incomeBalance - expenseBalance;
    availableBalance.textContent = ` ${availableBalanceValue.toFixed(2)}`;
}