<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roadmap;
use App\Models\Content;
use Illuminate\Support\Facades\DB;

class RoadmapContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $roadmaps = [
            'Basics - Beginner' => [
                'Introduction' => 'History, Basic structure, Running and compiling',
                'Syntax' => 'Variables and data types, Constants and literals, User input and output',
                'Operators' => 'Arithmetic, Relational, Logical, Assignment, Increment',
                'Control structures' => 'If-else, Switch, While (do-while)',
                'Functions' => 'Declaration & Definition, Calling, Return values, Parameters (by-value, by-reference)',
                'Arrays and Strings' => 'One-dimensional, Multidimensional, Strings',
            ],
            'Basics - Intermediate' => [
                'Pointers and References' => 'Basics, Arithmetic, Dynamic memory allocation, References and reference variables',
                'Object-Oriented Programming (OOP)' => 'Classes & objects, Constructors and destructors, Access specifiers (public, private, protected), Static members',
                'Inheritance' => 'Base and derived classes, Types of inheritance (single, multiple, multilevel, hierarchical), Overriding and hiding',
                'Polymorphism' => 'Function overloading, Operator overloading, Virtual functions, Abstract classes and pure virtual functions',
                'File Handling' => 'File streams (ifstream, ofstream, fstream), Reading from and writing to files, File modes and file pointers',
            ],
            'Basics - Advanced' => [
                'Templates' => 'Function Templates, Class Templates, Template specialization',
                'STL' => 'Vectors, Lists, Deques, Stacks, Queues, Priority queues, Maps, Sets, Algorithms',
                'Exception Handling' => 'Try, catch, and throw, Custom exceptions',
                'Multithreading' => 'Basics, Thread management, Synchronization (mutexes, locks)',
                'Advanced Data Structures' => 'Linked lists, Trees (binary trees, binary search trees, AVL trees), Graphs, Hash tables',
                'Advanced OOP Concepts' => 'Multiple inheritance, Virtual inheritance, RTTI (Run-Time Type Information)',
                'Advanced Memory Management' => 'Smart pointers (unique_ptr, shared_ptr, weak_ptr), Custom allocators',
                'Design Patterns' => 'Creational patterns (Singleton, Factory, Abstract Factory), Structural patterns (Adapter, Composite, Proxy), Behavioral patterns (Observer, Strategy, Command)',
            ],
        ];

        foreach ($roadmaps as $roadmapName => $contents) {
            $roadmap = Roadmap::create(['name' => $roadmapName]);

            foreach ($contents as $contentTitle => $description) {
                $content = Content::create([
                    'title' => $contentTitle,
                    'description' => $description,
                    'link' => 'https://www.google.com',
                ]);

                DB::table('roadmap_contents')->insert([
                    'roadmap_id' => $roadmap->id,
                    'content_id' => $content->id,
                ]);
            }
        }
    }
}
