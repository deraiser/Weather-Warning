<div class="weatherWarningMap">
    <a id="weatherWarningMapItem" class="jsTooltip jsStaticDialog" data-dialog-id="weatherWarningMapDialog" title="{lang}wcf.weatherWarning.viewFullSize{/lang}">
        <img src="{@$germanyMap}" class="germanyMap" alt="">
    </a>
    <img src="{@$germanyMapInfo}" class="germanyMapInfo" alt="">
    
    <a href="https://www.dwd.de/DE/wetter/warnungen_gemeinden/warnWetter_node.htm"{if EXTERNAL_LINK_TARGET_BLANK} target="_blank"{/if} class="button"><span class="icon icon24 fa-info"></span> <span>{lang}wcf.weatherWarning.more.information{/lang}</span></a>
</div>

<div id="weatherWarningMapDialog" class="jsStaticDialogContent" style="display: none;" data-title="{lang}wcf.weatherWarning.dwd{/lang}">
    <div class="weatherWarningMap">
        <img src="{@$germanyMap}" class="germanyMap" alt="">
        <img src="{@$germanyMapInfo}" class="germanyMapInfo" alt="">
    </div>
</div>