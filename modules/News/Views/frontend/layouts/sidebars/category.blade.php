@php
    $list_category = $model_category->with('translations')->get()->toTree();
@endphp
@if(!empty($list_category))
<div class="terms_condition_widget">
    <h4 class="title">{{ $item->title }}</h4>
    <div class="widget_list">
        <ul class="list_details order_list list-style-type-bullet">
            <?php
            $traverse = function ($categories, $prefix = '') use (&$traverse) {
                foreach ($categories as $category) {
                    $translation = $category->translateOrOrigin(app()->getLocale());
                    ?>
                        <li>
                            <a href="{{ $category->getDetailUrl() }}">{{$prefix}} {{$translation->name}}</a>
                        </li>
                    <?php
                    $traverse($category->children, $prefix . '-');
                }
            };
            $traverse($list_category);
            ?>
        </ul>
    </div>
</div>
@endif