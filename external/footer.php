<?php
if (!defined('XHPROF_LIB_ROOT')) {
  define('XHPROF_LIB_ROOT', dirname(dirname(__FILE__)) . '/xhprof_lib');
}

if(!empty($_xhprof['error'])) {
  return;
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $isAjax = true;
}

if ($_xhprof['ext_name'] && $_xhprof['doprofile'] === true) {
    $profiler_namespace = $_xhprof['namespace'];  // namespace for your application
    $xhprof_data = call_user_func($_xhprof['ext_name'].'_disable');
    $xhprof_runs = new XHProfRuns_Default();
    $run_id = $xhprof_runs->save_run($xhprof_data, $profiler_namespace, null, $_xhprof);
    error_log("Completed profiling: {$run_id}");
}
