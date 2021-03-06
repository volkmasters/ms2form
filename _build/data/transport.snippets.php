<?php

$snippets = array();

$tmp = array(
  'ms2form' => array(
    'file' => 'ms2form',
    'description' => '',
  ),
);

foreach ($tmp as $k => $v) {
  /* @avr modSnippet $snippet */
  $snippet = $modx->newObject('modSnippet');
  $snippet->fromArray(array(
    'id' => 0,
    'name' => $k,
    'description' => @$v['description'],
    'snippet' => getSnippetContent($sources['source_core'] . '/elements/snippets/snippet.' . $v['file'] . '.php'),
    'static' => BUILD_SNIPPET_STATIC,
    'source' => 1,
    'static_file' => PKG_STATIC_PATH . '/elements/snippets/snippet.' . $v['file'] . '.php',
  ), '', true, true);

  $properties = include $sources['build'] . 'properties/properties.' . $v['file'] . '.php';
  $snippet->setProperties($properties);

  $snippets[] = $snippet;
}

unset($tmp, $properties);
return $snippets;