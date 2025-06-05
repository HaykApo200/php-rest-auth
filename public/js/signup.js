const form = document.getElementById('signup-form');
const result = document.getElementById('result');

form.addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    const data = {
        email: formData.get('email'),
        password: formData.get('password')
    };

    const response = await fetch('/api/signup.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    const resultData = await response.json();
    result.innerText = resultData.message || 'Unknown response';
});