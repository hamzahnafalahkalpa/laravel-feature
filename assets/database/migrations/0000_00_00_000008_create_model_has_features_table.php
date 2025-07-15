<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hanafalah\LaravelFeature\Models\Feature\MasterFeature;
use Hanafalah\LaravelFeature\Models\Feature\ModelHasFeature;
use Hanafalah\ModuleVersion\Models\Version\ModelHasVersion;

return new class extends Migration
{
    use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;

    private $__table;

    public function __construct()
    {
        $this->__table = app(config('database.models.ModelHasFeature', ModelHasFeature::class));
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $table_name = $this->__table->getTable();
        if (!$this->isTableExists()) {
            Schema::create($table_name, function (Blueprint $table) {
                $masterFeature  = app(config('database.models.MasterFeature', MasterFeature::class));

                $table->ulid('id')->primary();
                $table->string('model_type', 50)->nullable(false);
                $table->string('model_id', 36)->nullable(false);
                $table->foreignIdFor($masterFeature::class)->nullable(false)
                    ->index()->constrained()->restrictOnDelete()->cascadeOnUpdate();
                $table->timestamps();
                $table->softDeletes();

                $table->index(['model_type', 'model_id'], 'feature_model');
            });
        }

        if (!Schema::hasColumn($table_name, 'parent_id')) {
            Schema::table($table_name, function (Blueprint $table) use ($table_name) {
                $table->foreignIdFor($this->__table::class, 'parent_id')
                    ->after('id')->nullable()->index()->constrained($table_name)
                    ->cascadeOnUpdate()->restrictOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->__table->getTable());
    }
};
