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
                'C++ Introduction' => ['description' =>'History, Basic structure, Running and compiling' ,'link' =>'https://youtu.be/RsOEfAYIr0U?si=cYdotKyz_76719qR'],
                'Basic Syntax' => ['description'=>'Variables and data types, Constants and literals, User input and output','link' =>'https://youtu.be/Qt5qI_dIsno?si=5IEEwHWSEyfxqt0D'],
                'Operators' => ['description'=>'Arithmetic, Relational, Logical, Assignment, Increment','link' =>'https://youtu.be/sqgR26VHBa0?si=KfQOjTWxrATW3Cc3'],
                'Control structures' => ['description'=>'If-else, Switch, While (do-while)','link' =>'https://youtu.be/l67qWVYe-xo?si=baa3saxno_7fnEXT'],
                'Functions' => ['description'=>'Declaration & Definition, Calling, Return values, Parameters (by-value, by-reference)','link' =>'https://youtu.be/gWsCOHTl1nA?si=tUw1OJzx7CJ00zi-'],
                'Arrays and Strings' => ['description'=>'One-dimensional, Multidimensional, Strings','link' =>'https://youtu.be/T76E09hnEuo?si=CKSNQ3d-x_KxpWgt'],
            ],
            'Basics - Intermediate' => [
                'Pointers and References' => ['description' =>'Basics, Arithmetic, Dynamic memory allocation, References and reference variables','link' =>'https://youtu.be/DTxHyVn0ODg?si=sz9j2avm_x3h6fts'],
                'Object-Oriented Programming (OOP)' => ['description' =>'Classes & objects, Constructors and destructors, Access specifiers (public, private, protected), Static members','link' =>'https://youtu.be/wN0x9eZLix4?si=Zx7ygWbCYqI_mPHm'],
                'Inheritance' => ['description' =>'Base and derived classes, Types of inheritance (single, multiple, multilevel, hierarchical), Overriding and hiding','link' =>'https://youtu.be/-W-TYjL0aFE?si=_AUjKzD-AdzpjHOL'],
                'Polymorphism' => ['description' =>'Function overloading, Operator overloading, Virtual functions, Abstract classes and pure virtual functions','link' =>'https://youtu.be/4NPOIaUxnnk?si=NOxY9lMr38mdTmDI'],
                'File Handling' => ['description' =>'File streams (ifstream, ofstream, fstream), Reading from and writing to files, File modes and file pointers','link' =>'https://youtu.be/wpDSWDbGXrQ?si=RyynWNecSiXktZS8'],
            ],
            'Basics - Advanced' => [
                'Templates' => ['description' =>'Function Templates, Class Templates, Template specialization','link' =>'https://youtu.be/I-hZkUa9mIs?si=eNhFgSKvY7bgxUFJ'],
                'STL' => ['description' =>'Vectors, Lists, Deques, Stacks, Queues, Priority queues, Maps, Sets, Algorithms','link' =>'https://youtu.be/A63ofAzbnGo?si=2yLkL6e1hN2xguaQ'],
                'Exception Handling' => ['description' =>'Try, catch, and throw, Custom exceptions','link' =>'https://youtu.be/kjEhqgmEiWY?si=z0tNT4tLWqWrw3l1'],
                'Multithreading' => ['description' =>'Basics, Thread management, Synchronization (mutexes, locks)','link' =>'https://youtu.be/TPVH_coGAQs?si=D4J6A57ixuz6eLc2'],
                'Advanced Data Structures' => ['description' =>'Linked lists, Trees (binary trees, binary search trees, AVL trees), Graphs, Hash tables','link' =>'https://youtu.be/3_x_Fb31NLE?si=qCIPAkCqpTObH0nP'],
                'Advanced OOP Concepts' => ['description' =>'Multiple inheritance, Virtual inheritance, RTTI (Run-Time Type Information)','link' =>'https://youtu.be/W3kpFSbkqQ8?si=8HTADzIllnbyikeF'],
                'Advanced Memory Management' => ['description' =>'Smart pointers (unique_ptr, shared_ptr, weak_ptr), Custom allocators','link' =>'https://youtu.be/zuegQmMdy8M?si=BUR7iD-WW82TPJo4'],
                'Design Patterns' => ['description' =>'Creational patterns (Singleton, Factory, Abstract Factory), Structural patterns (Adapter, Composite, Proxy), Behavioral patterns (Observer, Strategy, Command)','link' =>'https://youtu.be/mE3qTp1TEbg?si=FS8uJyUEkkvyaFvZ'],
            ],
        ];

            foreach ($roadmaps as $roadmapName => $contents) {
            $roadmap = Roadmap::create(['name' => $roadmapName]);

            foreach ($contents as $contentTitle => $contentData) {
                $content = Content::create([
                    'title' => $contentTitle,
                    'description' => $contentData['description'],
                    'link' => $contentData['link'],
                ]);

                DB::table('roadmap_contents')->insert([
                    'roadmap_id' => $roadmap->id,
                    'content_id' => $content->id,
                ]);
            }
        }
    }
}
