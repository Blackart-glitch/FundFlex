 <div class="card shadow-sm">
     <img src="{{ asset('electricity.png') }}" alt="electricity" class="bd-placeholder-img card-img-top" width="100%"
         height="150" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
         preserveAspectRatio="xMidYMid slice" focusable="false">
     <div class="card-body">
         <p class="card-text">{{ $name }}</p>
         <div class="d-flex justify-content-between align-items-center">
             <div class="btn-group">
                 <button type="button" class="btn btn-sm btn-outline-secondary">
                     View Bill
                 </button>
                 <button type="button" class="btn btn-sm btn-outline-secondary">
                     Pay Bill
                 </button>
             </div>
         </div>
     </div>
 </div>
