<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>

      @if (session()->get('language') == 'hindi')
        <span style="font-size: 15px">श्रेणियाँ</span>
      @else
        Categories
      @endif

    </div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        @php
            $categories = App\Models\Category::orderBy('id', 'DESC')->get();
        @endphp


        @foreach ($categories as $category)

        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        
          @if (session()->get('language') == 'hindi')
            <span style="font-size: 15px">{{ $category->category_name_hin }}</span>
          @else
            {{ $category->category_name_en }}
          @endif
          </a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                
                @php
                  $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                @endphp

                @foreach ($subcategories as $sub)

                <div class="col-sm-12 col-md-3">
                  
                  <h2 class="title">
                    <a href="{{ url('subcategory/product/'.$sub->id.'/'.$sub->subcategory_slug_en ) }}">
                  @if (session()->get('language') == 'hindi')
                    {{ $sub->subcategory_name_hin }}
                  @else
                    {{ $sub->subcategory_name_en }}
                  @endif
                  </a>
                  </h2>
                  

                  @php
                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $sub->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                  @endphp

                  @foreach ($subsubcategories as $subsub)

                  <ul class="links list-unstyled">
                    <li><a href="{{ url('subsubcategory/product/'.$subsub->id.'/'.$subsub->subsubcategory_slug_en ) }}">
                        
                      @if (session()->get('language') == 'hindi')
                        <span style="font-size: 15px">{{ $subsub->subsubcategory_name_hin }}</span>
                      @else
                        {{ $subsub->subsubcategory_name_en }}
                      @endif

                    </a></li>
                  </ul>
                  @endforeach
                </div>

                @endforeach
                <!-- /.col --> 
              </div>
              <!-- /.row --> 
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> 
        </li>
        
        @endforeach
        <!-- /.menu-item -->
        
      </ul>
      <!-- /.nav --> 
    </nav>
    <!-- /.megamenu-horizontal --> 
  </div>