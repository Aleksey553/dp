<label for="">Выбор пользователя</label>
<select class="form-control" name="user_id" id="">
    @foreach ($user as $item)
        <option @if($order->user->id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
</select>
<label for="">Выбор услуги</label>
<select class="form-control" name="service_id[]" multiple id="">
@foreach ($service as $item)
        <option @if(in_array($item->id, $order->service_id)) selected @endif value="{{$item->id}}">{{$item->title}}</option>
@endforeach
</select>

<label for="example-datetime-local-input" class="col-2 col-form-label">Дата и время</label>
<div class="col-10">
  <input class="form-control" name="date" type="datetime-local" value="{{isset($order->date)? $order->date : ''}}" id="example-datetime-local-input">
</div>

<label for="">Статус заказа</label>
<select class="form-control" name="status">
    <option @if(isset($order->status) == \App\Orders::STATUS_DONE) selected @endif value="{{\App\Orders::STATUS_DONE}}">Выполнено</option>
    <option @if(isset($order->status) == \App\Orders::STATUS_CANCEL) selected @endif value="{{\App\Orders::STATUS_CANCEL}}">Отменено</option>
    <option @if(isset($order->status) == \App\Orders::STATUS_WAITING) selected @endif value="{{\App\Orders::STATUS_WAITING}}">В ожидании</option>
</select>

<input class="btn btn-primary" type="submit" value="Сохранить">
