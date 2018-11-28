<div id="mymodule_block_left" class="block">
  <h4>Welcome!</h4>
  <div class="block_content">
    <p>Hello,
       {if isset($module_faq_name) && $module_faq_name}
           {$module_faq_name}
       {else}
           World
       {/if}
       !
    </p>
    <ul>
      <li><a href="{$module_faq_link}" title="Click this link">Click me!</a></li>
    </ul>
  </div>
</div>
