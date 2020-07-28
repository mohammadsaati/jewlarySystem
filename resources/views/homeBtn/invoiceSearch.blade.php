<div class="box" style="padding: .5rem">
   <form method="POST" action="{{ route('invoice.search') }}">
        @csrf
        <div class="form-row">
            <div class="col-lg-3">
                <button type="submit" class="btn btn-success search-btn full-width">
                    جستجو
                </button>
            </div>
            <div class="col-lg-8">
                <input type="text" class="form-control text-right input-search full-width" placeholder="نام مشتری" name="search" />
            </div>
            <div class="col-lg-1">
                <i class="fas fa-search" style="margin-top: 20%"></i>
            </div>    
        </div>
   </form>
</div>