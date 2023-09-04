<div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="width: auto !important;" id="mytoast">
    <div class="p-3 rounded-3" style="min-width: 16rem !important; background-color: {{ $componentSetup['backgroundColor'] }};">
         <div class="d-flex align-items-center justify-content-between">
             <div class="d-flex align-items-center gap-2" style="color: {{ $componentSetup['color'] }}">
                 <img src="/icons/{{ $componentSetup['icon'] }}" alt="">
                 <h6 class="p-0 m-0">{{ $componentSetup['typeLabel'] }}</h6>
             </div>
             <button type="button" class="btn border-0 bg-transparent p-0 close" style="cursor: pointer;"> 
                <i class="fa-solid fa-x" style="color: {{ $componentSetup['color'] }}" data-target="#mytoast"></i>
             </button>
         </div>
         <div class="pt-3" style="color: {{ $componentSetup['color'] }}">
            {{ $slot }}
         </div>
    </div>
 </div>