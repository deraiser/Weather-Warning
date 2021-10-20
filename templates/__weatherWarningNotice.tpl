{if $__wcf->user->getUserOption('weatherWarningRegionEnable')}
    {if $__wcf->getUserWeatherWarningHandler()->hasWarnings()}
        <p class="warning">{lang}wcf.weatherWarning.notice{/lang}</p>
    {/if}
{/if}