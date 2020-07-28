<div class="col-5"
            style="padding: 15px; box-shadow:0px 4px 4px #ccc; border-radius:5px;   
                @if($totaljw > 0)
                   background-color:#08c413;
                @else 
                    background-color:#e32158e0;
                    color:#ffff;
                @endif
            "
        >
           <div class="row">
                <div class="col-8" dir="rtl">
                    {{ $totaljw }}
                     :طلا های تازه  
                </div>
               <div class="col-4">
                        <button type="button" class="btn btn-sm btn-primary full-width" data-toggle="modal" data-target="#newInc">
                            به روز رسانی
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="newInc" tabindex="-1" role="dialog" aria-labelledby="newIncLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="newIncLabel">افزایش گرم طلا تازه</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('newjw.increase') }}">
                                        @csrf
                                        <input type="text" name="newin" class="form-control" />
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