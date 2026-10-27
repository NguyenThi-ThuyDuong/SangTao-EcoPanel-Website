<ul class="h-card hidden" style="display: none !important;">
    <li class="h-fn fn"><?=$setting['ten'.$lang]?></li>
    <li class="h-org org"><?=$setting['ten'.$lang]?></li>
    <li class="h-tel tel"><?=preg_replace('/[^0-9]/','',$optsetting['hotline']);?></li>
    <li><a class="u-url ul" href="<?=$config_base?>"><?=$config_base?></a></li>
</ul>
<h1 class="hidden-seoh" style="display: none !important;"><?=$seo->getSeo('h1')?></h1>
