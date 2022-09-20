<form action="/api/comment" method="POST">
    <div class="form-group">
        <label for="username">Pseudo</label>
        <input id="username" name="username" type="text" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" class="form-control" required></textarea>
    </div>

    <div class="mt-3">
        <button class="btn btn-primary" type="submit">Envoyer</button>
    </div>
</form>

<script>
    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        fetch(form.action, { method: form.method, body: new FormData(form) })
            .then(response => response.json())
            .then(() => {
                window.location.reload();
            });
    });
</script>
