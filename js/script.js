const loginForm = document.getElementById('login-form');
const appContainer = document.getElementById('app-container');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');

loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const username = usernameInput.value;
    const password = passwordInput.value;

    // Aqui você pode adicionar lógica de autenticação.
    // Exemplo simples: Verificando se o nome de usuário e senha são iguais.
    if (username === 'teste@gmail.com' && password === 'suasenha') {
        loginForm.style.display = 'none';
        appContainer.style.display = 'block';
    } else {
        alert('Credenciais inválidas. Tente novamente.');
    }
});

const expenseForm = document.getElementById('expense-form');
const expenseInput = document.getElementById('expense-input');
const amountInput = document.getElementById('amount-input');
const balanceAmount = document.getElementById('balance-amount');
const expenseList = document.getElementById('expense-list');
const addIncomeButton = document.getElementById('add-income');

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

    balance -= expenseAmount;
    balanceAmount.textContent = balance.toFixed(2);

    expenseInput.value = '';
    amountInput.value = '';
});

addIncomeButton.addEventListener('click', () => {
    const income = parseFloat(prompt('Informe o valor do ganho (R$):'));

    if (!isNaN(income)) {
        balance += income;
        balanceAmount.textContent = balance.toFixed(2);
    } else {
        alert('Por favor, insira um valor válido.');
    }
});

function removeExpense(button) {
    const listItem = button.parentElement;
    const expenseAmount = parseFloat(listItem.textContent.match(/R\$\s([\d\.]+)/)[1]);
    
    balance += expenseAmount;
    balanceAmount.textContent = balance.toFixed(2);
    
    listItem.remove();
}
