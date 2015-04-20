<?php
/**
 * Part of the Sentry package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Sentry
 * @version    2.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationCartalystSentryInstallUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->text('permissions')->nullable();
			$table->boolean('activated')->default(0);
			$table->string('activation_code')->nullable();
			$table->timestamp('activated_at')->nullable();
			$table->timestamp('last_login')->nullable();
			$table->string('persist_code')->nullable();
			$table->string('reset_password_code')->nullable();
<<<<<<< HEAD:vendor/cartalyst/sentry/src/migrations/2012_12_06_225921_migration_cartalyst_sentry_install_users.php
			$table->string('username',20)->unique();
			$table->string('mobile',100)->nullable();
			$table->integer('role_id')->default(1);
			$table->string('gender',100)->nullable();
=======
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();

			// Add it on 2015-04-17
			$table->string('username');
			$table->string('qq');
			$table->string('mobile');
			$table->boolean('gender')->default(0);  // 0=male 1=female

>>>>>>> 2ca0e4cc18c475e1f6087e2837286fe70d4a71c3:app/database/migrations/2012_12_06_225921_migration_cartalyst_sentry_install_users.php
			$table->timestamps();

			// We'll need to ensure that MySQL uses the InnoDB engine to
			// support the indexes, other engines aren't affected.
			$table->engine = 'InnoDB';
			$table->index('activation_code');
			$table->index('reset_password_code');

			// Add it on 2015-04-17
			$table->unique('email');
			$table->unique('username');
			$table->unique('mobile');
			$table->unique('qq');

			// sentry 2.1.5 table
			/*
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->text('permissions')->nullable();
			$table->boolean('activated')->default(0);
			$table->string('activation_code')->nullable();
			$table->timestamp('activated_at')->nullable();
			$table->timestamp('last_login')->nullable();
			$table->string('persist_code')->nullable();
			$table->string('reset_password_code')->nullable();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->timestamps();
			// We'll need to ensure that MySQL uses the InnoDB engine to
			// support the indexes, other engines aren't affected.
			$table->engine = 'InnoDB';
			$table->unique('email');
			$table->index('activation_code');
			$table->index('reset_password_code');
			*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
