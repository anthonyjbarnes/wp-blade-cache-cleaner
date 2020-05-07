<?php
/**
 * Class DeleteCache
 *
 * @package Blade_Cache_Cleaner
 */

/**
 * DeleteCache test case.
 */
class test_DeleteCache extends WP_UnitTestCase
{
    private $cache_path;

    private $filename;

    public function setup()
    {
        parent::setup();

        $this->cache_path = '/app/public_html/app/uploads/cache/';
        $this->filename = $this->cache_path.'8b0cc0c4b9136b6bfe4a51c336423bbfee4c5e2a.php';

        if (!file_exists(dirname($this->filename))) {
            mkdir(dirname($this->filename), 0777, true);
        }
    }


    public function testCheckForCache()
    {
        if (file_exists($this->filename)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    /**
     * A test to check deleting cache works.
     */
    public function testDeleteCacheFiles()
    {
        $plugin = new Blade_Cache_Cleaner();
        $plugin_admin = new Blade_Cache_Cleaner_Admin($plugin->get_plugin_name(), $plugin->get_version());

        $plugin_admin->DeleteFiles($this->cache_path);

	    if (!file_exists($this->filename)) {
		    $this->assertTrue(true);
	    } else {
		    $this->assertTrue(false);
	    }
    }
}
