<div aria-live="polite" aria-atomic="true" style="">
    <!-- Position it -->
    <div id="main-toaster">
    
        @if(Session::has('success'))
            <div class="toast alert alert-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <div class="awesome-icon"></div>
                    <strong class="mr-auto pr-3">Just to let you know...</strong>
                    <small class="text-muted">a few seconds ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ Session::get('success') }}
                </div>
            </div>
            @php
                Session::forget('success');
            @endphp
        @endif

        @if(Session::has('info'))
            <div class="toast alert alert-info" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <div class="awesome-icon"></div>
                    <strong class="mr-auto pr-3">Just to let you know...</strong>
                    <small class="text-muted">a few seconds ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ Session::get('info') }}
                </div>
            </div>
            @php
                Session::forget('info');
            @endphp
        @endif

        @if(Session::has('warning'))
            <div class="toast alert alert-warning" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <div class="awesome-icon"></div>
                    <strong class="mr-auto pr-3">Just to let you know...</strong>
                    <small class="text-muted">a few seconds ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ Session::get('warning') }}
                </div>
            </div>
            @php
                Session::forget('warning');
            @endphp
        @endif

        @if(Session::has('error'))
            <div class="toast alert alert-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <div class="awesome-icon"></div>
                    <strong class="mr-auto pr-3">Just to let you know...</strong>
                    <small class="text-muted">a few seconds ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ Session::get('error') }}
                </div>
            </div>
            @php
                Session::forget('error');
            @endphp
        @endif
        
    </div>
</div>


  {{-- @if(Session::has('success'))
     $('.top-right').notify({
        message: { text: "{{ Session::get('success') }}" },
        type:'success'
      }).show();
     @php
       Session::forget('success');
     @endphp
  @endif


  @if(Session::has('info'))
      $('.top-right').notify({
        message: { text: "{{ Session::get('info') }}" },
        type:'info'
      }).show();
      @php
        Session::forget('info');
      @endphp
  @endif


  @if(Session::has('warning'))
  		$('.top-right').notify({
        message: { text: "{{ Session::get('warning') }}" },
        type:'warning'
      }).show();
      @php
        Session::forget('warning');
      @endphp
  @endif


  @if(Session::has('error'))
  		$('.top-right').notify({
        message: { text: "{{ Session::get('error') }}" },
        type:'danger'
      }).show();
      @php
        Session::forget('error');
      @endphp
  @endif --}}