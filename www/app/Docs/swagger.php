<?php

declare(strict_types=1);

namespace App\Docs;

 /**
 * @OA\Info(
 *     version="1.0",
 *     title="Laravel with DDD"
 * )
 * @OA\PathItem(path="/api")
 */

class Swagger
{
}

class CreateCityController
{
    /**
     * @OA\Post(
     *  tags={"city"},
     *     path="/api/city/create",
     *     summary="Adds a new city",
     *  description="<br />
     * States alloweds: **SP**, **MG**, **MT**, **RS** and others... <br />
     * Timezones alloweds: **BRT**, **EZT**, **EET** and **FJT** <br />",
     * @OA\RequestBody(
     * @OA\MediaType(
     *             mediaType="application/json",
     * @OA\Schema(
     * @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     * @OA\Property(
     *                     property="state",
     *                     type="string"
     *                 ),
     * @OA\Property(
     *                     property="description",
     *                     type="string"
     *                 ),
     * @OA\Property(
     *                     property="birthdate",
     *                     type="date"
     *                 ),
     * @OA\Property(
     *                     property="population",
     *                     type="int"
     *                 ),
     * @OA\Property(
     *                     property="salaryAvg",
     *                     type="double"
     *                 ),
     * @OA\Property(
     *                     property="timezone",
     *                     type="string"
     *                 ),
     *                 example={
     *                           "name":"Sao Paulo",
     *                           "description":"Descricao de Sampa",
     *                           "birthdate":"1800-01-01",
     *                           "population": 123,
     *                           "salaryAvg":323,
     *                           "state":"SP",
     *                           "timezone":"BRT"
     *                       }
     *             )
     *         )
     *     ),
     * @OA\Response(
     *         response=204,
     *         description="No content",
     *     ),
     * @OA\Response(
     *         response=422,
     *         description="Unprocessable Content",
     * @OA\MediaType(
     *          mediaType="application/json",
     * @OA\Schema(
     * @OA\Property(
     *                  property="errors",
     *                  type="array",
     * @OA\Items(
     *                          type="array",
     * @OA\Items(
     * @OA\Property(property="message", type="string", example="The name field is required."),
     *                           ),
     *                      ),
     *             ),
     * @OA\Property(property="message", type="string", example="The name field is required."),
     *          ),
     *      ),
     *   ),
     * )
     */
    public function create(): void
    {
    }
/**
     * @OA\Get(
     *  path="/api/city/search",
     *  summary="Search cities",
     *  tags={"city"},
     *  description="Search for cities",
     * @OA\Parameter(name="name", example="Sao Paulo", in="query", @OA\Property(property="name", type="string")),
     * @OA\Parameter(name="description", example="Terra da garoa", in="query", @OA\Property(property="description", type="string")),
     * @OA\Parameter(name="state", example="SP", in="query", @OA\Property(property="state", type="string")),
     * @OA\Parameter(name="populationInitial", example="1", in="query", @OA\Property(property="populationInitial", type="integer")),
     * @OA\Parameter(name="populationEnd", example="9999", in="query", @OA\Property(property="populationEnd", type="integer")),
     * @OA\Parameter(name="birthdateInitial", example="1500-01-01", in="query", @OA\Property(property="birthdateInitial", type="date")),
     * @OA\Parameter(name="birthdateEnd", example="1600-01-01", in="query", @OA\Property(property="birthdateEnd", type="double")),
     * @OA\Parameter(name="salaryInitial", example="20000", in="query", @OA\Property(property="salaryInitial", type="double")),
     * @OA\Parameter(name="salaryEnd", example="30000", in="query", @OA\Property(property="salaryInitial", type="double")),
     * @OA\Parameter(name="timezone", example="BRT", in="query", @OA\Property(property="timezone", type="string")),
     * @OA\Parameter(name="sortField", example="name", in="query", @OA\Property(property="sortField", type="string")),
     * @OA\Parameter(name="sortDirection", example="desc", in="query", @OA\Property(property="sortDirection", type="string")),
     * @OA\Response(
     *         response=200,
     *         description="Ok",
     * @OA\MediaType(
     *          mediaType="application/json",
     * @OA\Schema(
     * @OA\Property(
     *        property="data",
     *        type="object",
     * @OA\Property(
     *            property="current_page",
     *            type="number",
     *        ),
     * @OA\Property(
     *            property="data",
     *            type="array",
     * @OA\Items(
     *                type="object",
     * @OA\Property(
     *                    property="name",
     *                    type="string",
     *                    example="Sao Paulo",
     *                ),
     * @OA\Property(
     *                    property="description",
     *                    type="string",
     *                    example="Terra da garoa",
     *                ),
     * @OA\Property(
     *                    property="state",
     *                    type="string",
     *                    example="SP",
     *                ),
     * @OA\Property(
     *                    property="birthdate",
     *                    type="date",
     *                    example="1600-02-02",
     *                ),
     * @OA\Property(
     *                    property="population",
     *                    type="int",
     *                    example="2000000",
     *                ),
     * @OA\Property(
     *                    property="salary_avg",
     *                    type="double",
     *                    example="20000.23",
     *                ),
     * @OA\Property(
     *                    property="timezone",
     *                    type="string",
     *                    example="BRT",
     *                ),
     *
     *            ),
     *        ),
     * @OA\Property(
     *            property="first_page_url",
     *            type="string",
     *            example="?page=1",
     *        ),
     * @OA\Property(
     *            property="from",
     *            type="number",
     *            example="1",
     *        ),
     * @OA\Property(
     *            property="last_page",
     *            type="number",
     *            example="3",
     *        ),
     * @OA\Property(
     *            property="last_page_url",
     *            type="string",
     *            example="?page=3",
     *        ),
     * @OA\Property(
     *            property="links",
     *            type="array",
     * @OA\Items(
     *                type="object",
     * @OA\Property(
     *                    property="url",
     *                    format="nullable",
     *                    type="string",
     *                ),
     * @OA\Property(
     *                    property="label",
     *                    type="string",
     *                    example="&laquo; Previous",
     *                ),
     * @OA\Property(
     *                    property="active",
     *                    type="boolean",
     *                ),
     *            ),
     *        ),
     * @OA\Property(
     *            property="next_page_url",
     *            type="string",
     *            example="?page=2",
     *        ),
     * @OA\Property(
     *            property="path",
     *            type="string",
     *        ),
     * @OA\Property(
     *            property="per_page",
     *            type="number",
     *            example="15",
     *        ),
     * @OA\Property(
     *            property="prev_page_url",
     *            format="nullable",
     *            type="string",
     *        ),
     * @OA\Property(
     *            property="to",
     *            type="number",
     *            example="15",
     *        ),
     * @OA\Property(
     *            property="total",
     *            type="number",
     *            example="40",
     *        ),
     *    ),
     *          ),
     *      ),
     *   ),
     * @OA\Response(
     *         response=422,
     *         description="Unprocessable Content",
     * @OA\MediaType(
     *          mediaType="application/json",
     * @OA\Schema(
     * @OA\Property(
     *        property="errors",
     *        type="array",
     * @OA\Items(
     *            type="array",
     * @OA\Items(
     *                type="object",
     * @OA\Property(
     *                    property="birthdate",
     *                    type="string",
     *                    example="The birthdate initial field is required when birthdate end is present.",
     *                ),
     *            ),
     *        ),
     *    ),
     * @OA\Property(
     *        property="message",
     *        type="string",
     *        example="The birthdate initial field is required when birthdate end is present.",
     *    ),
     *      ),
     *      ),
     *   ),
     * @OA\Response(
     *         response=404,
     *         description="Not Found",
     * @OA\MediaType(
     *          mediaType="application/json",
     * @OA\Schema(
     * @OA\Property(
     *        property="errors",
     *        type="array",
     * @OA\Items(
     *            type="array",
     * @OA\Items(
     *                type="object",
     * @OA\Property(
     *                    property="message",
     *                    type="string",
     *                    example="Content not found. Please, change your filter and try again.",
     *                ),
     *            ),
     *        ),
     *    ),
     * @OA\Property(
     *        property="message",
     *        type="string",
     *        example="Content not found. Please, change your filter and try again.",
     *    ),
     *      ),
     *      ),
     *   ),
     *  )
     */

    public function find(): void
    {
    }
}
