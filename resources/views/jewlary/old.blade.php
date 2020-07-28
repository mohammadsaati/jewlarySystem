<div class="col-6" style="background-color: #ffbf009c; border-radius:5px; padding:15px; box-shadow:0px 4px 4px #ccc;">
    <div class="row">
        <div class="col-6" dir="rtl">
            {{ $totalojw }}
             :طلا های دست دوم 
        </div>
       <div class="col-3">
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-danger full-width" data-toggle="modal" data-target="#oldincrease">
                    افزایش
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="oldincrease" tabindex="-1" role="dialog" aria-labelledby="oldincreaseLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="oldincreaseLabel">افزایش گرم طلای دست دوم</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('oldjw.increase') }}">
                                @csrf
                                <input type="text" name="oldin" class="form-control" />
                                <br />
                                <button type="submit" class="btn btn-primary full-width">دخیره</button>

                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بی خیال</button>
                        </div>
                    </div>
                    </div>
                </div>
       </div>

       <div class="col-3">
                <button type="button" class="btn btn-sm btn-info full-width" data-toggle="modal" data-target="#olddec">
                   کاهش
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="olddec" tabindex="-1" role="dialog" aria-labelledby="olddecLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="olddecLabel">افزایش گرم طلای دست دوم</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('oldjw.dec') }}">
                                @csrf
                                <input type="text" name="oldin" class="form-control" />
                                <br />
                                <button type="submit" class="btn btn-primary full-width">دخیره</button>

                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بی خیال</button>
                        </div>
                    </div>
                    </div>
                </div>
       </div>
   </div>
</div>