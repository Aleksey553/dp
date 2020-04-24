@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
@endif
<label for="">Наименование</label>
<input type="text" class="form-control" name="name" placeholder="Имя" value="@if(old('name')){{ old('name') }} @else {{isset($user->name) ? $user->name : ""}} @endif"
required>
<label for="">емаил</label>
<input type="email" class="form-control" name="email" placeholder="Заголовок категории" value="@if(old('email')){{ old('email') }} @else {{isset($user->email) ? $user->email : ""}} @endif"
       required>
<label for="">Пароль</label>
<input type="password" class="form-control" name="password" placeholder="Ввести пароль" >

<label for="">Пароль подтверждение</label>
<input type="password" class="form-control" name="password_confirmation" placeholder="Подтвердить пароль" >

<label for="">Роль пользователя</label>
<select class="form-control" name="role">
    <option @if(isset($user->role) == \App\User::ROLE_USER) selected @endif value="{{\App\User::ROLE_USER}}">Обычный пользователь</option>
    <option @if(isset($user->role) == \App\User::ROLE_ADMIN) selected @endif value="{{\App\User::ROLE_ADMIN}}">Администатор</option>
</select>


<input class="btn btn-primary" type="submit" value="Сохранить">
