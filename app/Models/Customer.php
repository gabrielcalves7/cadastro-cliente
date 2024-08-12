<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = [
        'name',
        'document',
        'birthDate',
        'email'
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    private string $name;
    private string $document;
    private Carbon $birthDate;
    private string $email;
    private int $id;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function make(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute(
                $key,
                $value == 'birthDate'
                    ? Carbon::parse($value)
                    : $value
            );
        }
        return $this;
    }

    public function getRules(): array
    {
        $rules = [
            'name' => 'required|min:3|max:191',
            'email' => 'required',
            'document' => 'required',
            'birthDate' => 'required',
        ];

        if ($this->id != null) {
            $editRules = [
                'id' => 'required|exists:customers,id',
            ];

            $rules = array_merge($editRules, $rules);
        }

        return $rules;
    }

    public function updateOrCreate(): bool
    {
        try {
            return self::query()->updateOrCreate(['id' => $this->id ?? null], $this->getAttributes()) != null;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function getAllPaginated($amountOfRows = 15)
    {
        return self::paginate($amountOfRows);
    }


    public function getPaginatedWithSearch($amountOfRows = 15, $searchParams)
    {
        if ($searchParams == []) {
            return $this->getAllPaginated();
        }
        $query = self::query();
        foreach ($searchParams as $key => $value) {
            $query->where($key, 'like', "%$value%");
        }
        return $query->paginate($amountOfRows);
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }


}
