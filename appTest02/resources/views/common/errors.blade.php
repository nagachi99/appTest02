@if (count($errors) > 0)
    <div class="form-group col-12 mb-4">
        <div class="alert alert-secondary">
            <h2 class="display-6 text-center"><i class="fa fa-warning text-danger" class="red"></i> 入力した文字を修正してください</h2>
            <ul class="list-group rounded shadow">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-light"><i class="fa fa-check-square-o"></i>
                        {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
