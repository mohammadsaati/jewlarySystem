<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUser">
   مشتری جدید
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-right" id="createUserLabel">اضافه کردن مشتری جدید</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


         <form method="POST" action="{{ route('customer.store') }}">
            @csrf
            <div class="d-flex align-items-end">
                <div class="col-1 tex-center">
                    <i class="fas fa-user"></i>
                </div>
                <div class="col-10">
                    <input type="text" name="userName" class="form-control text-right my-input" placeholder="نام مشتری" />
                </div>
            </div>

            <br />

            <div class="d-flex align-items-end">
                <div class="col-1 tex-center">
                    <i class="fas fa-phone-volume"></i>
                </div>
                <div class="col-10">
                    <input type="text" name="phoneNumber" class="form-control text-right my-input" placeholder="شماره تلفن" />
                </div>
            </div>

            <br />
            <button type="submit" class="btn btn-success w-100 text-center">
                ثبت مشتری جدید
            </button>

         </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">بی خیال</button>
         
        </div>
      </div>
    </div>
  </div>