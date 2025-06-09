const form = document.getElementById('login-form');
const result = document.getElementById("result");

form.addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    const data = {
        email: formData.get('email'),
        password: formData.get('password')
    };

    try {
        const response = await fetch('/api/login.php', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        const resultData = await response.json();
        if (response.ok) {
            result.innerText = resultData.message || "Login successful";
            localStorage.setItem('token', resultData.token);
        } else {
            result.innerText = resultData.error || "Login failed";
        }

    } catch (err) {
        result.innerText = "Error occurred: " + err.message;
    }
});
