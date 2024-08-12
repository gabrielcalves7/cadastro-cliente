<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{

    protected static $uniqueDocuments = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;

        // Ensure unique email
        $email = $faker->unique()->safeEmail();

        // Ensure unique document number
        $document = $this->generateUniqueCpf();


        return [
            'name' => $faker->name(),
            'email' => $email,
            'birthDate' => $faker->date('Y-m-d'),
            'document' => $document,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Generate a valid and unique CPF number.
     *
     * @return string
     */
    protected function generateUniqueCpf(): string
    {
        do {
            $cpf = $this->generateCpf();
            echo "Gerando documento de numero " . count(self::$uniqueDocuments) ."...";
        } while (in_array($cpf, self::$uniqueDocuments));
        echo "Documento gerado: $cpf\n";
        self::$uniqueDocuments[] = $cpf;

        return $cpf;
    }

    protected function generateCpf(): string
    {
        $cpf = '';
        for ($i = 0; $i < 9; $i++) {
            $cpf .= rand(0, 9);
        }

        $cpf = $this->addCpfDigits($cpf);

        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }

    protected function addCpfDigits(string $cpfBase): string
    {
        $cpf = $cpfBase;
        $sum1 = 0;
        $sum2 = 0;
        $weight1 = 10;
        $weight2 = 11;

        for ($i = 0; $i < 9; $i++) {
            $sum1 += $cpf[$i] * $weight1--;
            $sum2 += $cpf[$i] * $weight2--;
        }

        $digit1 = ($sum1 % 11) < 2 ? 0 : 11 - ($sum1 % 11);
        $digit2 = ($sum2 + $digit1 * 2) % 11;
        $digit2 = $digit2 < 2 ? 0 : 11 - $digit2;

        return $cpfBase . $digit1 . $digit2;
    }
}
