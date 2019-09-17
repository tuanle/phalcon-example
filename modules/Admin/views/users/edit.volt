<h3>Edit user</h3>

<form method="post" action="{{ url.get(['for': 'admin.users.update', 'id': user.id]) }}">
    {{ form.render('csrf') }}
    <div class="form-group">
        <label for="input-name">Name</label>
        {{ form.render('name', ['id': 'input-name', 'class': 'form-control']) }}
        <div class="text-danger">{{ flashSession.has('name') ? flashSession.output('name') : '' }}</div>
    </div>
    <div class="form-group">
        <label for="input-email">Email</label>
        {{ form.render('email', ['id': 'input-email', 'class': 'form-control']) }}
        <div class="text-danger">{{ flashSession.has('email') ? flashSession.output('email') : '' }}</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ url.get(['for': 'admin.users.index']) }}" class="ml-2 btn btn-secondary">Back</a>
</form>
