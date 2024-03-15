@section('form')
    <div>
        <h1>Создание услуги</h1>
        <form action="service/submit" method="post">
            <div class="form-group">
                <label for="name">Введите название услуги</label>
                <input type="text" id="name" name="name" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Введите описание услуги</label>
                <input type="text" id="description" name="description" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="logo">Вставьте картинку</label>
                <input type="file" id="logo" name="logo" value="" class="form-control" alt="">
            </div>
        </form>
    </div>
