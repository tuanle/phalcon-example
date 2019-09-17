<div class="row">
    <div class="col text-right">
        <a href="{{ url.get(['for': 'admin.users.create']) }}" class="btn btn-primary">Create</a>
    </div>
</div>

<div class="row mt-4">
    <div class="col">
        <table class="table table-bordered">
           <tr>
               <th width="10%">No</th>
               <th width="30%">Name</th>
               <th width="40%">Email</th>
               <th width="20%">Action</th>
           </tr>
            {% for index, user in users %}
           <tr>
               <td>{{ user.id }}</td>
               <td>{{ user.name }}</td>
               <td>{{ user.email }}</td>
               <td><a class="btn btn-warning" href="{{ url.get(['for': 'admin.users.edit', 'id': user.id]) }}">Edit</a></td>
           </tr>
            {% endfor %}
        </table>
    </div>
</div>
