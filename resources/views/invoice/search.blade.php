<form method="POST" action="{{ route('invoice.search') }}">
    @csrf
    <div class="form-row">
        <div class="col-4">
            <button type="submit" class="btn btn-danger full-width bg-red">
                جستجو
            </button>
        </div>
        <div class="col-8">
            <input type="text" class="form-control text-right" name="search" placeholder="نام مشتری" />
        </div>
    </div>
</form>